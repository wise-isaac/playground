<template>
  <app-layout title="Marketplace">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Marketplace
      </h2>
    </template>

    <div class="text-right py-5">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- <router-link
          class="
            bg-blue-600
            hover:bg-blue-500
            text-white
            font-semibold
            hover:text-white
            py-2
            px-4
            border border-blue-600
            hover:border-transparent
            rounded
          "
          :to="route('dashboard')"
        >
          Upload New Product
        </router-link> -->
        <jet-nav-link
          :href="route('dashboard')"
          :active="route().current('dashboard')"
        >
          Upload New Product
        </jet-nav-link>
      </div>
    </div>

    <div v-show="showProductUploadForm == true">
      <ProductUploadForm />
    </div>

    <div>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div
          class="
            bg-white bg-white
            overflow-hidden
            shadow-xl
            sm:rounded-lg
            rounded
            shadow
            p-6
          "
        ></div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import ProductUploadForm from "./Components/Form.vue";

export default {
  components: {
    AppLayout,
    ProductUploadForm,
  },
  data: function () {
    return {
      showProductUploadForm: false,
    };
  },
  mounted() {},
  methods: {
    async addTask() {
      const res = await axios.post("/api/task-list", this.task).then((res) => {
        this.getTasks();
        this.task.description = "";
      });
      if (res.status === 201) {
        Toast.fire({
          icon: "success",
          title: res.data,
        });
      }
    },
  },
};
</script>
<style scoped>
.completed {
  text-decoration: line-through;
}
</style>
