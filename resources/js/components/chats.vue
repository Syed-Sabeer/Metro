<style>
  .break-word-input {
    word-break: break-word; /* Ensures words break at arbitrary points */
    max-width: 100%; /* Restricts the width of the input */
    white-space: pre-wrap; /* Preserves spaces and line breaks */
    overflow-wrap: break-word; /* Additional support for breaking long words */
  }
</style>
<template>

<div class="tab-content" id="ueberTabB">
                        <div class="tab-pane fade  show active" id="panel_b_first" role="tabpanel"
                            aria-labelledby="first-tab">
                            <div class="chat">
                                <div class="chat-body bg-white radius-xl">
                                    <div class="chat-header">
                                        <div class="media chat-name align-items-center">
                                            <div class="media-body align-self-center ">
                                                <h5 class=" mb-0 fw-500 mb-2">Domnic Harys</h5>
                                                <div class="media-body__content d-flex align-items-center">
                                                    <span class="badge-dot dot-success me-1"></span>
                                                    <small class="d-flex color-light fs-12 text-capitalize">
                                                        active now
                                                    </small>
                                                </div>
                                            </div>
                                        </div>

                                        <ul class="nav flex-nowrap">
                                            <li class="nav-item list-inline-item me-0">
                                                <div class="dropdown">
                                                    <a href="#" role="button" title="Details" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <img class="svg" src="/metros/public/img/svg/more-vertical.svg"
                                                            alt="more-vertical">
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item align-items-center d-flex" href="#"
                                                            data-chat-info-toggle>

                                                            <img class="svg" src="/metros/public/img/svg/users.svg" alt="users">
                                                            <span>Create new group</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="/metros/public/img/svg/trash-2.svg" alt>
                                                            <span>Delete conversation</span>
                                                        </a>
                                                        <a class="dropdown-item align-items-center d-flex" href="#">

                                                            <img class="svg" src="/metros/public/img/svg/x-octagon.svg" alt="x-octagon">
                                                            <span>Block & report</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="chat-box chat-box--big p-xl-30 ps-lg-20 pe-lg-0">



                                        <!-- <p class="social-connector text-center text-capitalize">
                                            <span>today</span>
                                        </p> -->







                                        <!-- <h2>Chat Room: {{ roomId }}</h2> -->
                                        <div v-for="message in messages" :key="message.id" class="flex-1"
     :class="{'outgoing-chat': message.sender_id == senderId, 'incoming-chat': message.sender_id !== senderId}">
    <div class="chat-text-box">
        <div class="media d-flex">
            <div class="media-body">
                <div class="chat-text-box__content">
                    <div v-if="message.sender_id == senderId" class="d-flex align-items-center justify-content-end">
                        <div class="chat-text-box__other d-flex"></div>
                        <div class="chat-text-box__subtitle p-20 bg-deep">
                            <p v-html="message.message" class="color-gray"></p>
                        </div>
                    </div>
                    <div v-else class="d-flex align-items-center mb-20 mt-10">
                        <div class="chat-text-box__subtitle p-20 bg-primary">
                            <p v-html="message.message" class="color-white"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                                    </div>


                                    <div class="chat-footer px-xl-30 px-lg-20 pb-lg-30 pt-1">
                                        <div class="chat-type-text">
                                            <div class="pt-0 outline-0 pb-0 pe-0 ps-0 rounded-0 position-relative d-flex align-items-center"
                                                tabindex="-1">
                                                <div
                                                    class="d-flex justify-content-between align-items-center w-100 flex-wrap">
                                                    <form @submit.prevent="sendMessage">
                                                    <div
                                                        class=" flex-1 d-flex align-items-center chat-type-text__write ms-0">

                                                        <textarea v-model="newMessage" style=" width: 300px;  height: 100px;  padding: 10px;  overflow-wrap: break-word;  word-break: break-word;  white-space: pre-wrap;"
                                                         class="form-control border-0 bg-transparent box-shadow-none"
                                                            placeholder="Type your message..." required></textarea>

                                                        </div>
                                                    <div class="chat-type-text__btn">

                                                        <button type="submit"
                                                            class="border-0 btn-primary wh-50 p-10 rounded-circle">
                                                            <img class="svg" src="/metros/public/img/svg/send.svg" alt="send"></button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
</template>

<script>
import axios from 'axios';

export default {
  props: {
    roomId: {
      type: Number,
      required: true,
    },
  },
  data() {
    return {
      messages: [], // Messages for the selected room
      newMessage: "", // New message input
      formattedMessage: '',
      senderId: 0, // Default sender ID; adjust as necessary
    };
  },
  watch: {
    roomId: {
      immediate: true,
      handler(newRoomId) {
        this.fetchMessages(newRoomId); // Fetch messages when roomId changes
      },
    },
  },
  methods: {
    // Fetch messages for the current room
    async fetchMessages(roomId) {
      try {
        const response = await axios.get(`../api/rooms/${roomId}/messages`);
        this.messages = response.data;
      } catch (error) {
        console.error("Error fetching messages:", error);
      }
    },
    // Send a new message
    async sendMessage() {
      if (!this.newMessage.trim()) return;

      try {
        const chunkSize = 20;
      const chunks = this.newMessage.match(new RegExp(`.{1,${chunkSize}}`, 'g')) || [];

      // Join chunks with newlines
      this.formattedMessage = chunks.join('</br>');

      // Simulate sending the message (replace this with your API call)
      console.log('Message to send:', this.formattedMessage);
        const response = await axios.post("../api/messages", {
          sender_id: this.senderId,
          room_id: this.roomId,
          message: this.formattedMessage,
        });

        // Add the new message to the chat
        this.messages.push(response.data);

        // Clear the input field
        this.newMessage = "";
      } catch (error) {
        console.error("Error sending message:", error.response.data);
      }
    },
  },
  mounted() {
    this.senderId = document.querySelector("meta[name='user-id']").getAttribute("content");

    this.fetchMessages(this.roomId); // Fetch messages when component mounts
  },
};
</script>
