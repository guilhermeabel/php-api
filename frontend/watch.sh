#!/bin/sh

bun build ./src/client/index.tsx --outdir ./public/build --watch &

bun --watch run src/server/index.ts
