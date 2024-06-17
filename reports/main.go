package main

import (
	"context"
	"flag"
	"log"
	"os"
	"time"

	"go.mongodb.org/mongo-driver/mongo"
	"go.mongodb.org/mongo-driver/mongo/options"
)

const version = "1.0.0"
const appName = "REPORTS-SERVICE"

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
	println("Initializing " + appName)

	var cfg config

	flag.IntVar(&cfg.port, "port", 9001, "API server port")
	flag.StringVar(&cfg.env, "env", "development", "Environment (development|staging|production)")
	flag.StringVar(&cfg.dbURI, "db-uri", os.Getenv("MONGO_CONNECTION_URI"), "Database URI")
	flag.Parse()

	logger := log.New(log.Writer(), appName+": ", log.LstdFlags)

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
			app.logger.Fatalf("mongodb disconnection error : %v", err)
		}
	}()

	err = mongoClient.Ping(ctx, nil)
	if err != nil {
		log.Fatal(err)
	}

	app.logger.Println("connected to MongoDB")

	err = app.NewServer().ListenAndServe()

	if err != nil {
		app.logger.Fatal(err)
	}

	app.logger.Printf("started on port %d", app.config.port)

}
