// server.js
const express = require('express');
const http = require('http');
const socketIo = require('socket.io');
const cors = require('cors'); // Import cors middleware

const app = express();
const server = http.createServer(app);
// const io = socketIo(server);
app.use(cors({ 
  origin: "http://localhost", // Allow only requests from 'http://localhost'
  methods: ["GET", "POST"],   // Allow GET and POST methods
}));

// Socket.io setup with CORS
const io = socketIo(server, {
  cors: {
    origin: "http://localhost", // Allow frontend origin
    methods: ["GET", "POST"],  // Allow GET and POST methods
  },
});

// Store user connections (user_id -> socket_id)
let users = {};

// Serve a basic route
app.get('/', (req, res) => {
  res.send('Socket.IO Server is running!');
});

// Socket.IO connection handling
io.on('connection', (socket) => {
  console.log('a user connected', socket.id);

  // Register user with a unique user_id
  // socket.on('registerUser', (userId) => {
  //   users[userId] = socket.id; // Store the socket ID associated with user_id
  //   console.log(`User ${userId} connected with socket id: ${socket.id}`);
  // });

  // // Handle receiving and sending a message to a specific user
  // socket.on('sendMessage', (data) => {
  //   console.log('Message received from user:', data);
    
  //   // Check if the receiver exists and emit the message
  //   if (users[data.receiver_id]) {
  //     console.log(`Sending message to user ${data.receiver_id}`);
  //     socket.to(users[data.receiver_id]).emit('receiveMessage', data); // Emit to the receiver's socket
  //   } else {
  //     console.log(`Receiver with user_id ${data.receiver_id} is not connected.`);
  //   }
  // });
  socket.on('joinRoom', ({ userId, room}) => {
    socket.join(room);
    
    io.to(room).emit('message', {
        user: `System ${room}`,
        text: `User ${userId} has joined the room.`,
    });
});

socket.on('sendMessage', ({ room, message, userId }) => {
  console.log(room);
  console.log(`Sending message to usersds ${[message[0]]}`);
  io.to(room).emit('message', { user: `User ${userId}`, text: message });
});
  // Handle disconnect event
  socket.on('disconnect', () => {
    // Find and remove the user from the 'users' object when they disconnect
    for (let userId in users) {
      if (users[userId] === socket.id) {
        delete users[userId];
        console.log(`User ${userId} disconnected`);
        break;
      }
    }
  });
});

// Start the server on port 3000
server.listen(3000, () => {
  console.log('Server running on http://localhost:3000');
});
