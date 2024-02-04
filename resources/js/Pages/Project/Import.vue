<template>
  <div class="flex m-auto border max-w-6xl p-4">
    <form>
      <input
        @change="setExcel"
        type="file"
        ref="file"
        class="hidden"
      >
      <a
        @click.prevent="selectExcel"
        href="#"
        class="block p-2 rounded-md bg-green-600 w-32 text-white text-center"
      >EXCEL</a>
    </form>
    <div class="ml-3">
      <a
        v-if="file"
        @click.prevent="importExcel"
        href="#"
        class="block p-2 rounded-md bg-sky-600 w-32 text-white text-center"
      >Import</a>
    </div>
  </div>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
export default {
  name: "Import",
  layout: MainLayout,
  data() {
    return {
      file: null,
    };
  },
  methods: {
    selectExcel() {
      this.$refs.file.click();
    },
    setExcel(e) {
      this.file = e.target.files[0];
    },
    importExcel() {
      const formData = new FormData();
      formData.append("file", this.file);
      this.$inertia.post("/projects/import", formData);
      //console.log("1111111");
    },
  },
};
</script>