package main

import (
	"log"
	"time"
)

type Post struct {
	Date    time.Time
	Title   string
	Content string
}

type App struct {
	logger *log.Logger
	config *Config
}

type Config struct {
	env     string
	version string
	port    string
}

func main() {

	appName := "go-frontend"

	logger := log.New(log.Writer(), appName+": ", log.LstdFlags)

	config := &Config{
		env:     "dev",
		version: "1.0.0",
		port:    "8000",
	}

	app := &App{
		config: config,
		logger: logger,
	}

	// posts := []Post{
	// 	{Title: "Hello, World!", Content: "This is the first post.", Date: time.Now()},
	// 	{Title: "Hello, Again!", Content: "This is the second post.", Date: time.Now()},
	// }

	err := app.NewServer().ListenAndServe()

	if err != nil {
		app.logger.Fatal(err)
	}

	app.logger.Printf("started on port %s", app.config.port)
}
