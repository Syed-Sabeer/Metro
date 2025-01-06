import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

export const store = new Vuex.Store({
  state: {
    messages: [],
  },
  mutations: {
    addMessage(state, message) {
      state.messages.push(message);
    },
  },
  actions: {
    sendMessage({ commit }, message) {
      commit("addMessage", message);
    },
  },
});