<template>
  <div class="form-group h-16 w-full flex flex-row">
    <input
      type="text"
      class="px-3 grow h-full text-lg"
      name="message"
      placeholder="Message"
      v-model="newMessage"
      @keydown.enter="handlePressKey"
    />
    <button
      class="
        bg-sky-400
        px-4
        text-white
        hover:bg-sky-600
        duration-100
        ease-in
        text-2xl
      "
      @click="sendMessage"
    >
      <i class="fa-solid fa-paper-plane"></i>
    </button>
  </div>
</template>
<script>
export default {
  props: {
    user: Object,
  },
  data() {
    return {
      newMessage: "",
    };
  },
  methods: {
    sendMessage() {
        this.$emit("messagesent", {
          user: this.user,
          message: this.newMessage,
        });
        this.newMessage = "";
      
    },
    handlePressKey() {
      this.sendMessage();
    },
  },
};
</script>
<style scoped>
</style>