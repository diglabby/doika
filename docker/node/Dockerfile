FROM node:10-alpine
RUN apk add --update git
WORKDIR /tmp
COPY package.json /tmp/
RUN npm config set registry http://registry.npmjs.org/ && npm install
WORKDIR /app
COPY . /app/
RUN cp -a /tmp/node_modules /app/
ENV NODE_ENV=dev
ENV PORT=4000
CMD [ “/usr/local/bin/node”, “./index.js” ]
EXPOSE 4000
