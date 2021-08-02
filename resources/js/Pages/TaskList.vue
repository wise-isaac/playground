<template>
  <app-layout title="TaskList">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Task List
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
          <div class="mb-4">
            <div class="flex mt-4">
              <input
                class="
                  shadow
                  appearance-none
                  border
                  rounded
                  w-full
                  py-2
                  px-3
                  mr-4
                  text-grey-darker
                "
                :placeholder="'Add Task'"
                v-model="task.name"
              />
              <button
                class="
                  bg-transparent
                  hover:bg-blue-500
                  text-blue-700
                  font-semibold
                  hover:text-white
                  py-2
                  px-4
                  border border-blue-500
                  hover:border-transparent
                  rounded
                "
              >
                Add
              </button>
            </div>
          </div>
          <div>
            <div
              class="flex mb-4 items-center"
              v-for="(task, key) in tasks"
              :key="key"
            >
              <p class="w-full text-grey-darkest">
                Add another component to Tailwind Components
              </p>
              <button
                class="
                  bg-transparent
                  hover:bg-green-500
                  text-green-700
                  font-semibold
                  hover:text-white
                  py-2
                  px-4
                  border border-green-500
                  hover:border-transparent
                  rounded
                "
              >
                Done
              </button>
              <button
                class="
                  bg-transparent
                  hover:bg-red-500
                  text-red-700
                  font-semibold
                  hover:text-white
                  py-2
                  px-4
                  ml-2
                  border border-red-500
                  hover:border-transparent
                  rounded
                "
              >
                Remove
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script>
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
  components: {
    AppLayout,
  },
  data: function () {
    return {
      task: {
        name: "",
      },
      tasks: {},
    };
  },
  methods: {
    store() {},
  },
};
</script>
