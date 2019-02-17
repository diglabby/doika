FROM node:10-alpine
RUN apk add --update git
# Create app directory

RUN mkdir -p /app
WORKDIR /app

# Install app dependencies
COPY package.json /app/
RUN npm install webpack -g
RUN npm install webpack-cli -g
RUN npm install webpack-dev-server -g
RUN npm install rimraf -g

CMD [ 'node' ]