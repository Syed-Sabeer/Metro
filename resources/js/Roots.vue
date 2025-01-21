<template>
    <div>
      <div class="chat-area d-flex mb-40 mt-3">
      <!-- <div>
        <label for="users">Select User:</label>
        <select v-model="selectedUser" @change="fetchMessages">
          <option v-for="user in users" :key="user.id" :value="user.id">
            {{ user.id }} - {{ user.name }}
          </option>
        </select>
      </div> -->


      <ChatMessages :case_id="case" @roomSelected="handleRoomSelection" />
      <ChatForm v-if="selectedRoomId" :roomId="selectedRoomId" />
    </div>
    </div>
  </template>

  <script>
  import ChatMessages from "./components/usergroup.vue";
  import ChatForm from "./components/chats.vue";
  import io from "socket.io-client";
  import axios from "axios";
  export default {
    components: { ChatMessages, ChatForm },
    data() {
      return {
        userId: 0, // Logged-in user's ID
        selectedUser: 0, // Chat partner's ID
        messages: [], // Chat messages
        users: [], // List of users
        case: 0,
        socket: null, // Socket.io connection
        selectedRoomId: null,
      };
    },
    created() {
      // Connect to the backend using Socket.io
      // this.socket = io("http://localhost:3000");
      // Register user after connection is established
      // this.socket.on("connect", () => {
      //   console.log("Socket connected:", this.socket.id);
      //   this.socket.emit('registerUser', this.userId); // Register the user with their userId
      // });
       this.userId = document.querySelector("meta[name='user-id']").getAttribute("content");
       this.case = document.querySelector("meta[name='room-id']").getAttribute("content");
      // this.socket.emit("joinRoom", {
      //         userId: this.userId,
      //         room: this.room,
      //     });
      //     this.socket.on("message", (data) => {
      //         this.messages.push(data);
      //         console.log("New message received:", data);
      //     });
      //     this.fetchMessages();

      // Listen for incoming messages
  //     this.socket.on("receiveMessage", (message) => {
  //   console.log("New message received:", message);
  //   this.messages.push(`${message.sender_id === this.userId ? 'You' : 'Other'}: ${message.message}`);
  // });

    },
    methods: {
      handleRoomSelection(roomId) {
        this.selectedRoomId = roomId; // Update selected room ID when a room is clicked
      },
    },
    mounted() {

      // Fetch room IDs when the component is mounted


      console.log("Logged-in user ID:", this.userId);
      console.log("Logged-in user ROOM:", this.case);
      console.log("Logged-in user messages:", this.messages);
      // this.fetchRooms(); // Fetch the list of users when the component is mounted
      // this.fetchMessages(); // Fetch initial messages when the component is mounted
    },
  };
  </script>
