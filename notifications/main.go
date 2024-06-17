package main

import (
	"flag"
	"log"
)

const version = "1.0.0"
const appName = "NOTIFICATIONS-SERVICE"

type config struct {
	port int
	env  string
}

type App struct {
	config config
	logger *log.Logger
}

func main() {
	println("Initializing " + appName)

	var cfg config

	flag.IntVar(&cfg.port, "port", 9002, "API server port")
	flag.StringVar(&cfg.env, "env", "development", "Environment (development|staging|production)")
	flag.Parse()

	logger := log.New(log.Writer(), appName+": ", log.LstdFlags)

	app := &App{
		config: cfg,
		logger: logger,
	}

	err := app.NewServer().ListenAndServe()

	if err != nil {
		app.logger.Fatal(err)
	}

	app.logger.Printf("started on port %d", app.config.port)
}
