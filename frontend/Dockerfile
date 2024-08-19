FROM cosmtrek/air:latest

WORKDIR /app

COPY . /app
RUN go mod download
RUN go install github.com/a-h/templ/cmd/templ@latest
RUN go mod tidy

CMD ["-c", ".air.toml"]
