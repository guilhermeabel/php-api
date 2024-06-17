FROM golang:alpine as build

RUN apk --no-cache add ca-certificates tzdata
WORKDIR /app

RUN go install github.com/air-verse/air@latest

COPY go.mod go.su[m] /app/

RUN go mod download

COPY . /app

# RUN CGO_ENABLED=0 go build -v -ldflags "-s -w" -o /bin /app

# FROM scratch

# COPY --from=build /usr/share/zoneinfo /usr/share/zoneinfo
# COPY --from=build /etc/ssl/certs/ca-certificates.crt /etc/ssl/certs/
# COPY --from=build /bin /

ENTRYPOINT ["air"]

