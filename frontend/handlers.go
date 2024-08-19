package main

import (
	"fmt"
	"net/http"

	"github.com/a-h/templ"
	"github.com/guilhermeabel/go-frontend/views/pages/about"
	"github.com/guilhermeabel/go-frontend/views/pages/home"
)

func (app *App) healthcheckHandler(w http.ResponseWriter, r *http.Request) {
	js := `{"status": "available", "environment": %q, "version": %q}`
	js = fmt.Sprintf(js, app.config.env, app.config.version)

	w.Header().Set("Content-Type", "application/json")

	w.WriteHeader(http.StatusOK)
	w.Write([]byte(js))

}

func render(w http.ResponseWriter, r *http.Request, c templ.Component) error {
	return c.Render(r.Context(), w)
}

func (app *App) home(w http.ResponseWriter, r *http.Request) {
	err := render(w, r, home.Index())
	if err != nil {
		app.logger.Printf("error rendering home page: %v", err)
		w.WriteHeader(http.StatusInternalServerError)
	}
}

func (app *App) about(w http.ResponseWriter, r *http.Request) {
	err := render(w, r, about.Index())
	if err != nil {
		app.logger.Printf("error rendering about page: %v", err)
		w.WriteHeader(http.StatusInternalServerError)
	}
}
