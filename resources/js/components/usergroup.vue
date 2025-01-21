<template>
 <div class="mb-lg-0 mb-40 chat-sidebar">
                        <div class="sidebar-group left-sidebar chat_sidebar">
                            <div id="chat" class="left-sidebar-wrap radius-xl active">
                                <div class="chat-wrapper py-25">

                                    <div class="search-tab">
                                        <ul class="nav ap-tab-main border-bottom text-capitalize" id="ueberTab"
                                            role="tablist">

                                            <li class="nav-item me-0">
                                                <a class="nav-link group-notification" id="second-tab"
                                                    data-bs-target="#panel_b_second" data-secondary="#panel_a_second"
                                                    data-bs-toggle="tab" href="#second" role="tab" aria-selected="true">
                                                    group chats
                                                    <span class="total-message ms-1">
                                                        <span class="badge badge-danger ">5</span>
                                                    </span>
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="search-body">
                                        <div class="tab-content" id="ueberTabA">

                                            <div class="tab-pane active" id="panel_a_second" role="tabpanel"
                                                aria-labelledby="second-tab">
                                                <ul class="user-list">
                                                    <li>
                                                        <div class="user-button-top">
                                                            <button type="button"
                                                                class="border bg-normal color-gray rounded-pill content-center  hh"  @click="openModal"   ><img
                                                                    class="svg" src="/metros/public/img/svg/edit.svg" alt="edit">create a
                                                                new group</button>
                                                        </div>
                                                    </li>
                                 <li class="user-list-item"  v-for="room in rooms" :key="room.id" @click="selectRoom(room.id)">
                                                        <div class="user-list-item__wrapper">
                                                            <div class="avatar avatar-circle ms-0">
                                                                <img src="/metros/public/img/ellipse1.png"
                                                                    class="rounded-circle wh-46 d-flex bg-opacity-primary"
                                                                    alt="image">
                                                                <div class="badge-direction-bottom">
                                                                    <span class="chat-badge-dot avatar-online"></span>
                                                                </div>
                                                            </div>
                                                            <div class="users-list-body">
                                                                <div class="users-list-body-title">
                                                                    <h6> Room ID: {{ room.name }}</h6>
                                                                    <div class="text-limit" data-maxlength="10">
                                                                        <p class="mb-0"><span>Lorem ipsum dolor us was they
                                                                                amet</span>...</p>
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="last-chat-time unread">
                                                                    <small>14:45 pm</small>
                                                                    <div
                                                                        class="total-message mt-1 d-flex justify-content-end">
                                                                        <span class="badge badge-success ">2</span>
                                                                    </div>
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <Modal :visible="isModalVisible" @close="closeModal">

                            <div class="card mb-25">
              <div class="card-header">
                <h6>Create Group</h6>
              </div>
              <div class="card-body px-0 pt-15 pb-25">
                <div class="todo-task table-responsive todo-task1">
                  <table class="table table-borderless">
                    <tbody class="ui-sortable">

                        <input
        type="text"
        v-model="newRoomName"
        placeholder="Enter Group name"
        class="form-control mb-2"
      />


                        <tr v-for="(participant, index) in participants" :key="index">
        <td>
          <div class="checkbox-group d-flex">
            <div class="checkbox-theme-default custom-checkbox checkbox-group__single d-flex">
              <input
                class="checkbox"
                type="checkbox"
                :id="'check-grp-td-' + participant.user.id"
                :checked="isChecked(participant.user.id)"
                @change="toggleCheckbox(participant.user.id)"
              >
              <label
                :for="'check-grp-td-' + participant.user.id"
                class="fs-14 color-primary"
              >
                {{ participant.user.name }}
              </label>
            </div>
          </div>
        </td>
      </tr>






                    </tbody>
                  </table>
                </div>
                <div class="add-task-action">
                  <button type="submit" @click="createRoom" class="btn btn-primary btn-transparent-primary btn-lg"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="svg replaced-svg"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg> Create Group</button>
                </div>

              </div>
            </div>

    </Modal>
    <!--dddddddddddddddddddddddddddddddddddddddddd dssffsdfsd -->
                    </div>
</template>

<script>
import axios from 'axios';
import Modal from "./Modal.vue";

export default {
    components: {
    Modal,
  },

  props: {
    case_id: {
      type:String,
      required: true,
    },
  },
  data() {
    return {
        participants: [], // Array to hold participants
        selectedUsers: [],
        isModalVisible: false,
      rooms: [],
      newGroupName: "",
    };
  },
  mounted() {



    this.fetchRooms();
    // this.fetchParticipants( );
  },
  methods: {

 //Fetch room participants from  APIthe
 fetchParticipants(roomId) {
      axios.get(`../api/room/${roomId}/participants`)
        .then(response => {
          this.participants = response.data;
        })
        .catch(error => {
          console.error('Error fetching participants:', error);
        });
    },
    isChecked(userId) {
      return this.selectedUsers.includes(userId);
    },
    toggleCheckbox(userId) {
      if (this.selectedUsers.includes(userId)) {
        // If the user is already selected, remove them from the array
        this.selectedUsers = this.selectedUsers.filter(id => id !== userId);
      } else {
        // If the user is not selected, add them to the array
        this.selectedUsers.push(userId);
      }
    },
openModal() {
  this.isModalVisible = true; // Open the modal
},
closeModal() {
  this.isModalVisible = false; // Close the modal
},
createGroup() {
  // Logic for creating a new group
  console.log("New group created:", this.newGroupName);
  this.newGroupName = ""; // Reset input
  this.closeModal(); // Close the modal after creation
},

async createRoom() {
    if (!this.newRoomName || this.selectedUsers.length === 0 || !this.case_id) {
      alert("Please fill out all fields and select participants.");
      return;
    }
const roomData = {
      roomName: this.newRoomName,
      caseId: this.case_id,
      userIds: this.selectedUsers,
    };

    try {
      // Replace `/api/rooms` with your actual backend route
      const response = await axios.post("../api/addroom", roomData);
      alert("Room created successfully!");
      console.log(response.data);

      // Clear form data
      this.newRoomName = "";
      this.selectedUsers = [];
    } catch (error) {
      console.error("Error creating room:", error);
      alert("Failed to create room.");
    }
},





    fetchRooms() {
      axios
        .get(`../api/rooms/${this.case_id}`)
        .then((response) => {
        //   this.rooms = response.data;
          const rawRooms = response.data; // Example: {"": 2, "hatims": 8}

// Transform the object into an array of objects
this.rooms = Object.entries(rawRooms).map(([name, id]) => ({
  id,
  name: name || "Unnamed Room", // Handle empty string keys
}));
if (this.rooms.length > 0) {
        const firstRoomId = this.rooms[0].id;
        this.fetchParticipants(firstRoomId);
      }
         else{

          this.fetchParticipants(this.rooms[0].id);
         }
        })
        .catch((error) => {
          console.error('Error fetching rooms:', error);
        });
    },
    selectRoom(roomId) {
      this.$emit("roomSelected", roomId); // Emit the selected room ID to the parent
    },
  },



};
</script>
