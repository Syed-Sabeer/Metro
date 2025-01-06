<template>
 <div class="tab-pane fade show active" id="project-timeline" role="tabpanel"
                                aria-labelledby="project-timeline-tab">
                               
                                <div class="card-body px-0 mx-25">
                                    <div class="task-activities d-flex align-items-center">
                                        <div class="task-activities__left d-flex">
                                            <div
                                                class="content-center border bg-normal radius-xl me-sm-20 me-0 task-activities__month">
                                                <div class=" px-20 text-center">
                                                    <h5>21</h5>
                                                    <span class="fs-13 color-gray">December</span>
                                                </div>
                                            </div>
                                            <div class="task-activities__right">
                                                <ul>
                                                    <li class>
                                                        <div
                                                            class="ffp d-flex justify-content-between align-items-center w-100">
                                                            <div class="d-flex">
                                                                <div
                                                                    class="me-3 ffp__imgWrapper d-flex align-items-center ">
                                                                    
                                                               </div>
                                                                <div> 
                                                                    <a >
                                                                        <div v-for="(msg, index) in messages" :key="index"  class="message">
                                                                            
                                                                            <span
                                                                                class="color-light mx-1 fw-400">
                                                                               </span>  <strong>{{ msg.user }}:</strong> {{ msg.text }}
                                                                          
                                                                            
                                                                        </div>
                                                                    </a>
                                                                    <span
                                                                        class="pt-1 d-block color-extra-light fs-12">
                                                                        3:30 PM
                                                                    </span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                 
                                                   
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
</template>

<script>
import axios from 'axios';
import io from "socket.io-client";
export default {
  props: {
    messages: {
      type: Array,
      required: true,
    },
  },
};
</script>
