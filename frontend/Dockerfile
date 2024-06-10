FROM oven/bun:latest

COPY . .
RUN bun install

USER bun
EXPOSE 3000/tcp

ENTRYPOINT [ "bun", "build", "src/index.ts", "--outdir", "build", "--watch"]
