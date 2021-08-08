<template>
  <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
    <label for="image" class="block text-sm font-medium text-gray-700">
      Image
    </label>
    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
      <div class="space-y-1 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
        <div class="flex text-sm text-gray-600">
          <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
            <span>Upload a file</span>
            <input
                :v-model="image"
                id="image"
                name="image"
                type="file"
                class="sr-only"
                hidden
                @change="upload($event.target.files)"
            >
          </label>
          <p class="pl-1">or drag and drop</p>
        </div>
        <p class="text-xs text-gray-500">
          PNG, JPG, GIF up to 10MB
        </p>
        <h1 class="pt-8 pb-3 font-semibold sm:text-lg text-gray-900">
          To Upload
        </h1>

        <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
          <li id="empty" class="h-full w-full text-center flex flex-col items-center justify-center items-center">
            <img class="mx-auto w-32" src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png" alt="no data" />
            <span class="text-small text-gray-500">No files selected</span>
          </li>
        </ul>
      </div>
    </div>
  </div>

</template>

<script lang="ts">
import axios from "axios";

export default {
  name: "ImageUpload",
  emits: ['file-uploaded'],
  setup (_, context) {
    const upload = async (files: FileList) => {
      const file = files.item(0);

      const data = new FormData;
      data.append('image', file);

      const res = await axios.post('upload', data);

      context.emit('file-uploaded', res.data.data);
    }
  }
}
</script>