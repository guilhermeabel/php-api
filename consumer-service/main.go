package main

import (
	"context"
	"flag"
	"fmt"
	"log"
	"os"
	"time"

	"go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
)

const version = "1.0.0"

type config struct {
	port  int
	env   string
	dbURI string
}

type App struct {
	config config
	logger *log.Logger
}

func main() {
	println("Initializing consumer service")

	var cfg config

	flag.IntVar(&cfg.port, "port", 4000, "API server port")
	flag.StringVar(&cfg.env, "env", "development", "Environment (development|staging|production)")
	flag.StringVar(&cfg.dbURI, "db-uri", os.Getenv("MONGO_CONNECTION_URI"), "Database URI")
	flag.Parse()

	logger := log.New(log.Writer(), "CONSUMER-SERVICE: ", log.LstdFlags)

	app := &App{
		config: cfg,
		logger: logger,
	}

	ctx, cancel := context.WithTimeout(context.Background(), 30*time.Second)

	mongoClient, err := mongo.Connect(
		ctx,
		options.Client().ApplyURI(app.config.dbURI),
	)

	if err != nil {
		app.logger.Fatalf("mongodb connection error : %v", err)
	}

	defer func() {
		cancel()
		if err := mongoClient.Disconnect(ctx); err != nil {
			log.Fatalf("mongodb disconnect error : %v", err)
		}
	}()

	err = mongoClient.Ping(ctx, nil)
	if err != nil {
		log.Fatal(err)
	}

	fmt.Println("Connected to MongoDB!")

	err = app.NewServer().ListenAndServe()

	if err != nil {
		println("Error during consumer service startup")
		app.logger.Fatal(err)
	}

	println("Consumer service started")

}
