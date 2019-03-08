FROM node:10-alpine
RUN apk add --update git
# Create app directory

RUN npm install webpack -g
RUN npm install webpack-cli -g
RUN npm install webpack-dev-server -g
RUN npm install rimraf -g
WORKDIR /tmp
COPY package.json /tmp/
RUN npm config set registry http://registry.npmjs.org/ && npm install
WORKDIR /app
COPY . /app/
RUN cp -a /tmp/node_modules /app/
RUN webpack
ENV NODE_ENV=dev
ENV PORT=4000
CMD [ “/usr/local/bin/node”, “./index.js” ]
EXPOSE 4000
