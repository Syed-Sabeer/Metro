<template>

<div class="col-lg-12 mb-50">
                    <div class="ticket-chat-wrapper pt-25 pb-30">
                    <h4>Log</h4>
 
                    <div class="ticket-search-header">
                   
                    <img class="svg" src="img/svg/smile.svg" alt="smile">
                    <input v-model="message"  @keyup.enter="submitMessage" class="form-control me-sm-2 border-0 box-shadow-none" type="search" placeholder="Type your message..." aria-label="Search">
                   
                    <button type="submit" @click="submitMessage" class="border-0 btn-primary wh-50 p-10 rounded-circle">
                    <img class="svg" src="img/svg/send.svg" alt="send">
                    </button>
                    </div>

                    </div>
                    </div>
</template>

<script>
import axios from 'axios';
export default {
  data() {
    return {
      message: "", // Message input
      
    };
  },


  methods: {
    submitMessage() {
      if (this.message.trim() !== "") {
        // Emit message to parent component
        this.$emit("send-message", this.message);
        this.message = ""; // Clear input field
      }
    },
  
  },
};  
</script>
