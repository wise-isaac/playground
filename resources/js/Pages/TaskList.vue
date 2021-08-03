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
                type="text"
                name="Task description"
                class="
                  shadow
                  appearance-none
                  border
                  rounded
                  w-full
                  py-2
                  px-3
                  mr-4
                  text-grey-lighter
                "
                :placeholder="'Add Task'"
                v-model="task.description"
              />
              <button
                type="button"
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
                @click="addTask"
              >
                Add
              </button>
            </div>
          </div>
          <div>
            <div
              class="flex mb-4 items-center"
              v-for="(data, key) in tasks"
              :key="key"
            >
              <p
                class="w-full text-grey-darkest"
                :class="{ completed: data.completed === 1 }"
              >
                {{ data.description }}
              </p>
              <button
                v-show="data.completed === 0"
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
                @click="updateTask(data.id, { completed: 1 })"
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
                @click="destroyTask(data.id)"
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
      tasks: [],
      task: {
        description: "",
      },
    };
  },
  mounted() {
    this.getTasks();
  },
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
    async getTasks() {
      axios
        .get("/api/task-list")
        .then((res) => {
          this.tasks = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    async updateTask(id, data) {
      await axios.patch("/api/task-list/" + id, data).then((res) => {
        this.getTasks();
      });
    },
    async destroyTask(id) {
      await axios.delete("/api/task-list/" + id).then((res) => {
        this.getTasks();
      });
    },
  },
};
</script>
<style scoped>
.completed {
  text-decoration: line-through;
}
</style>
