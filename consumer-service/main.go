package main

import (
	"flag"
	"log"
)

const version = "1.0.0"

type config struct {
	port int
	env  string
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
	flag.Parse()

	logger := log.New(log.Writer(), "CONSUMER-SERVICE: ", log.LstdFlags)

	app := &App{
		config: cfg,
		logger: logger,
	}

	err := app.NewServer().ListenAndServe()

	if err != nil {
		println("Error during consumer service startup")
		log.Fatal(err)
	}

	println("Consumer service started")

}
