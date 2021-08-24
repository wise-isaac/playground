<template>
  <app-layout title="Marketplace">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Marketplace
      </h2>
    </template>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pb-5 pt-10">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8">
        <div class="grid grid-cols-1">
          <h3 class="text-gray-700 font-bold text-lg my-auto">
            Uploaded Products
          </h3>
        </div>
      </div>
    </div>

    <div v-show="showProductUploadForm == true">
      <ProductUploadForm />
    </div>

    <a>
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden sm:rounded-lg">
          <div class="container">
            <div class="max-w-sm">
              <div
                class="
                  bg-white
                  relative
                  shadow-lg
                  hover:shadow-xl
                  transition
                  duration-500
                  rounded-lg
                "
              >
                <img
                  class="rounded-t-lg"
                  src="https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1049&q=80"
                  alt=""
                />
                <div class="py-6 px-8 rounded-lg bg-white">
                  <h2
                    class="
                      text-gray-700
                      font-bold
                      text-2xl
                      mb-3
                      hover:text-gray-900
                      hover:cursor-pointer
                    "
                  >
                    Title
                  </h2>
                  <p class="text-gray-700 tracking-wide">Description</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </a>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";

import ProductUploadForm from "./Components/Form.vue";

export default {
  components: {
    AppLayout,
    JetNavLink,
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
