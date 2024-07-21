FROM node:21-alpine

WORKDIR /app

COPY . .

RUN npm install

ENV PATH /app/node_modules/.bin:$PATH

ENTRYPOINT ["npm"]

CMD ["run", "dev"]
