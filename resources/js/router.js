import Vue from "vue";
import VueRouter from "vue-router";
// import RouterBase from "./components/RouterBase.vue";

Vue.use(VueRouter);

import TaskList from "./playground/components/TaskList.vue"

const routes = [{
    path: '/task-list',
    component: TaskList,
}]

export default new VueRouter({
	routes,
	mode: "history",
});
