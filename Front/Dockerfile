# Use a lightweight Node.js image as the base image
FROM node:14-alpine

# Set the working directory in the container
WORKDIR /app

# Copy package.json and package-lock.json to the working directory
COPY package*.json ./

# Install project dependencies
RUN npm install

# Copy the entire project to the working directory
COPY . .

# Build the Vue.js app
RUN npm run build

# Expose the port the app will run on
EXPOSE 8080

# Command to run the application
CMD ["npm", "run", "serve"]
