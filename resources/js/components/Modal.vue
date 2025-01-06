<!-- Modal.vue -->
<template>
    <div v-if="visible" class="modal-overlay">
      <div class="modall">
        <slot></slot>
        <button @click="closeModal">Close</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      visible: {
        type: Boolean,
        default: false,
      },
    },
    emits: ["close"],
    methods: {
      closeModal() {
        this.$emit("close");
      },
    },
  };
  </script>
  
  <style>
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }
  .modall {
    background: white;
    padding: 20px;
    border-radius: 8px;
    min-width: 300px;
    text-align: center;
  }
  </style>
  