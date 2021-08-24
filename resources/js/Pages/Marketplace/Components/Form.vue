<template>
  <app-layout title="Marketplace">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Marketplace
      </h2>
    </template>

    <div class="py-12">
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
        >
          <div class="flex justify-center">
            <div class="flex">
              <h1 class="text-gray-600 font-bold md:text-2xl text-xl">
                Product Details
              </h1>
            </div>
          </div>

          <div class="grid grid-cols-1 md:grid-cols-2 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
              <label
                class="
                  uppercase
                  md:text-sm
                  text-xs text-gray-500 text-light
                  font-semibold
                "
                >Product Type</label
              >
              <select
                class="
                  py-2
                  px-3
                  rounded-lg
                  border-2 border-purple-300
                  mt-1
                  focus:outline-none
                  focus:ring-2 focus:ring-purple-600
                  focus:border-transparent
                "
                v-model="productData.type"
              >
                <option value="trainers">Trainers</option>
              </select>
            </div>

            <div class="grid grid-cols-1">
              <label
                class="
                  uppercase
                  md:text-sm
                  text-xs text-gray-500 text-light
                  font-semibold
                "
                >Brand</label
              >
              <select
                class="
                  py-2
                  px-3
                  rounded-lg
                  border-2 border-purple-300
                  mt-1
                  focus:outline-none
                  focus:ring-2 focus:ring-purple-600
                  focus:border-transparent
                "
                v-model="productData.brand"
              >
                <option value="adidas">Adidas</option>
                <option value="nike">Nike</option>
              </select>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label
              class="
                uppercase
                md:text-sm
                text-xs text-gray-500 text-light
                font-semibold
              "
              >Product Name</label
            >
            <input
              class="
                py-2
                px-3
                rounded-lg
                border-2 border-purple-300
                mt-1
                focus:outline-none
                focus:ring-2 focus:ring-purple-600
                focus:border-transparent
              "
              type="text"
              placeholder="Product name..."
              v-model="productData.name"
            />
          </div>

          <div class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7">
            <div class="grid grid-cols-1">
              <label
                class="
                  uppercase
                  md:text-sm
                  text-xs text-gray-500 text-light
                  font-semibold
                "
                >Product Description</label
              >
              <textarea
                class="
                  py-2
                  px-3
                  rounded-lg
                  border-2 border-purple-300
                  mt-1
                  focus:outline-none
                  focus:ring-2 focus:ring-purple-600
                  focus:border-transparent
                "
                type="text"
                placeholder="Product description..."
                v-model="productData.description"
              ></textarea>
            </div>
          </div>

          <div class="grid grid-cols-1 mt-5 mx-7">
            <label
              class="
                uppercase
                md:text-sm
                text-xs text-gray-500 text-light
                font-semibold
                mb-1
              "
              >Upload Image</label
            >
            <div class="flex items-center justify-center w-full">
              <label
                class="
                  flex flex-col
                  border-4 border-dashed
                  w-full
                  h-32
                  hover:bg-gray-100
                  hover:border-purple-300
                  group
                "
              >
                <div class="flex flex-col items-center justify-center pt-7">
                  <svg
                    class="
                      w-10
                      h-10
                      text-purple-400
                      group-hover:text-purple-600
                    "
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                    ></path>
                  </svg>
                  <p
                    class="
                      lowercase
                      text-sm text-gray-400
                      group-hover:text-purple-600
                      pt-1
                      tracking-wider
                    "
                  >
                    Select an image
                  </p>
                </div>
                <input
                  id="file-upload"
                  class="hidden"
                  type="file"
                  ref="file"
                  enctype="multipart/form-data"
                  multiple
                  @change="onFileChange"
                />
              </label>
            </div>
          </div>

          <div
            class="grid grid-cols-1 gap-5 md:gap-8 mt-5 mx-7"
            v-show="productData.images.length > 0"
          >
            <label
              class="
                uppercase
                md:text-sm
                text-xs text-gray-500 text-light
                font-semibold
                mb-1
              "
              >Selected Images</label
            >
          </div>

          <div class="grid grid-cols-1 md:grid-cols-4 gap-5 md:gap-8 mt-5 mx-7">
            <div
              class="grid grid-cols-1 mt-5 mx-7"
              v-for="(image, key) in productData.images"
              :key="key"
            >
              <img :src="image.src" alt="" />
            </div>
          </div>

          <div
            class="flex items-center justify-center md:gap-8 gap-4 pt-5 pb-5"
          >
            <a
              class="
                w-auto
                bg-gray-500
                hover:bg-gray-700
                rounded-lg
                shadow-xl
                font-medium
                text-white
                px-4
                py-2
              "
              :href="route('marketplace')"
              >Cancel</a
            >
            <button
              class="
                w-auto
                bg-purple-500
                hover:bg-purple-700
                rounded-lg
                shadow-xl
                font-medium
                text-white
                px-4
                py-2
              "
              type="button"
              @click="save"
            >
              Save
            </button>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";
import JetNavLink from "@/Jetstream/NavLink.vue";

export default {
  components: {
    AppLayout,
    JetNavLink,
  },
  data: function () {
    return {
      productData: {
        type: "trainers",
        brand: "adidas",
        name: "",
        description: "",
        images: [],
      },
    };
  },
  mounted() {},
  methods: {
    async save() {
      const res = await axios.post(
        "/api/marketplace/new-product",
        this.productData
      );
      if (res.status === 201) {
        Toast.fire({
          icon: "success",
          title: res.data,
        });
      }
    },
    async onFileChange(e) {
      let selectedFiles = e.target.files;
      if (e.target.files.length !== 0) {
        for (let i = 0; i < selectedFiles.length; i++) {
          let img = {
            src: URL.createObjectURL(selectedFiles[i]),
            file: selectedFiles[i],
          };
          this.productData.images.push(img);
          this.file = e.target.files[0];
        }
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
