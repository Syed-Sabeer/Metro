<template>
  <div>
    <!-- <div>
      <label for="users">Select User:</label>
      <select v-model="selectedUser" @change="fetchMessages">
        <option v-for="user in users" :key="user.id" :value="user.id">
          {{ user.id }} - {{ user.name }}
        </option>
      </select>
    </div> -->

    <ChatMessages :messages="messages" />
    <ChatForm @send-message="sendMessage" />
  </div>
</template>

<script>
import ChatMessages from "./components/ExampleComponent.vue";
import ChatForm from "./components/ChatForm.vue";
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
      room: 0,
      socket: null, // Socket.io connection
    };
  },
  created() {
    // Connect to the backend using Socket.io
    this.socket = io("http://localhost:3000");
    // Register user after connection is established
    // this.socket.on("connect", () => {
    //   console.log("Socket connected:", this.socket.id);
    //   this.socket.emit('registerUser', this.userId); // Register the user with their userId
    // });
    this.userId = document.querySelector("meta[name='user-id']").getAttribute("content");
    this.room = document.querySelector("meta[name='room-id']").getAttribute("content");
    this.socket.emit("joinRoom", {
            userId: this.userId,
            room: this.room,
        });
        this.socket.on("message", (data) => {
            this.messages.push(data);
            console.log("New message received:", data);
        });
        this.fetchMessages();

    // Listen for incoming messages
//     this.socket.on("receiveMessage", (message) => {
//   console.log("New message received:", message);
//   this.messages.push(`${message.sender_id === this.userId ? 'You' : 'Other'}: ${message.message}`);
// });

  },
  methods: {
    // async fetchRooms() {
    //   try {
    //     const response = await axios.get("/metros/metros/public/api/room");
    //     console.log("Fetched Users:", response.data.users); // Check if data is received
    //     if (response.data && response.data.users) {
    //       this.users = response.data.users;
    //     } else {
    //       console.error("No users data found in the response.");
    //     }
    //   } catch (error) {
    //     console.error("Failed to fetch users:", error);
    //   }
    // },

    // async fetchMessages() {
    //   try {
    //     const response = await axios.get("/metros/metros/public/api/messages", {
    //       params: {
    //         sender_id: this.userId,
    //         receiver_id: this.selectedUser,
    //       },
    //     });
    //     this.messages = response.data.messages.map((msg) =>
    //       msg.sender_id === this.userId
    //         ? `You: ${msg.message}`
    //         : `Other: ${msg.message}`
    //     );
    //   } catch (error) {
    //     console.error("Failed to fetch messages:", error);
    //   }
    // },

    // async sendMessage(message) {
    //   try {
    //     // Emit the message if socket is connected
    //     this.socket.emit("sendMessage", {
    //       sender_id: this.userId,
    //       receiver_id: this.selectedUser,
    //       message: message,
    //     });

    //     // Send the message to the backend
    //     const response = await axios.post("/metros/metros/public/api/messages", {
    //       sender_id: this.userId,
    //       receiver_id: this.selectedUser,
    //       message: message,
    //     });

    //     this.messages.push(`You: ${message}`);
    //   } catch (error) {
    //     console.error("Failed to send message:", error);
    //   }
    // },
    async fetchMessages() {
    try {
        const response = await axios.get(`/metro/public/api/rooms/${this.room}/messages`);
        
        // Assuming the API returns an array of messages in `response.data.messages`
        this.messages = response.data.map((msg) =>{
        const user = msg.sender_id == this.userId ? "You" : msg.user || "Other"; // Use msg.user or fallback to "Other"
  const text = msg.message;

  return { user, text };
});
        console.log(response.data.messages);

    } catch (error) {
        console.error("Failed to fetch messages:", error);
    }
},

    async sendMessage(message) {
            if (this.message === "") return;

            // Send message with userId as the sender
            this.socket.emit("sendMessage", {
                room: this.room,
                message: message,
                userId: this.userId,
            });
            const response = await axios.post("/metro/public/api/rooms/messages", {
              room_id: this.room,
              message: message,
                sender_id: this.userId,
        });
        
        }
  },
  mounted() {
   
    console.log("Logged-in user ID:", this.userId);
    console.log("Logged-in user ROOM:", this.room);
    console.log("Logged-in user messages:", this.messages);
    // this.fetchRooms(); // Fetch the list of users when the component is mounted
    // this.fetchMessages(); // Fetch initial messages when the component is mounted
  },
};
</script>
