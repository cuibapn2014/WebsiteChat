<template>
  <ul class="overflow-auto box__messages">
    <li
      class="mx-2 my-3"
      v-for="(message, index) in this.messages"
      :key="index"
    >
      <div
        v-if="message.user.id != user.id"
        class="w-full min-h-16 flex items-start justify-start"
      >
        <img
          class="h-12 w-12 object-cover rounded-full border-2"
          :src="!message.user.image ? '/images/user.jpg' : message.user.image"
          :alt="message.user.name"
        />
        <div class="flex flex-col">
          <div
            class="
              bg-white
              shadow-md
              max-w-md
              px-3
              py-2
              rounded-lg
              mx-2
              text-black text-lg
              select-auto
            "
          >
            {{ message.message }}
          </div>
          <small class="text-md mx-3 my-2">{{
            new Date(message.created_at).toLocaleString()
          }}</small>
        </div>
      </div>
      <div v-else class="w-full min-h-16 flex flex-col items-end justify-end">
        <div
          class="
            bg-sky-400
            shadow-md
            max-w-md
            px-3
            py-2
            rounded-lg
            mx-2
            text-white text-lg
            select-auto
          "
        >
          {{ message.message }}
        </div>
        <small class="text-md mx-3 my-2">{{
          new Date(message.created_at).toLocaleString()
        }}</small>
      </div>
    </li>
  </ul>
</template>
<script>
import axios from "axios";
export default {
  props: {
    user: Object,
    messages: Array,
  },
  // created(){
  //   this.fetchMessage();
  // },
  updated() {
    this.scrollBottom();
  },
  data() {
    return {
      // messages: null,
      isLoaded: false,
    };
  },
  methods: {
    scrollBottom() {
      const scrollHeight =
        document.querySelector(".box__messages").scrollHeight;
      document.querySelector(".box__messages").scrollTop = scrollHeight;
    },
    async fetchMessage() {
      await axios({
        url: "/messages/1",
        method: "GET",
      }).then((res) => (this.messages = res.data));
    },
  },
};
</script>
<style scoped>
ul {
  height: calc(100% - 7rem);
  scroll-behavior: smooth;
}
</style>