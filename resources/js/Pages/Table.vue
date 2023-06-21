<template>
  <Head title="Table"/>

  <AuthenticatedLayout>
    <template #header>
      Table
    </template>

    <div class="p-4 bg-white rounded-lg shadow-xs" id="wow">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left text-black">
                <tbody class="border" >
                    <tr class="bg-white" v-for="row in 4">
                        <td scope="col" class="px-6 py-3 border text-center" v-for="col in 4">
                            <div v-for="sentence in sentences">
                                <div v-if="sentence.row == row && sentence.col == col">
                                    <button @click="modalShowing=true; setSelectedItem(sentence)">
                                        <h1 :class="sentence.css">
                                            {{ sentence.text }}
                                        </h1>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <card-modal :showing="modalShowing" @close="modalShowing=false">
                    <div id="error">
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="text" class="text-white font-bold">Text</label>
                        <input type="text" class="form-control rounded" id="text" v-model="selectedItem.text" required/>
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="row" class="text-white font-bold">Row</label>
                        <input type="number" class="form-control rounded" id="row" min="1" max="4" v-model="selectedItem.row" required>
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="col" class="text-white font-bold">Column</label>
                        <input type="number" class="form-control rounded" id="col" min="1" max="4" v-model="selectedItem.col" required>
                    </div>
                    <div class="flex flex-col py-2">
                        <label for="col" class="text-white font-bold">Text Styling & Color</label>
                        <input type="text" class="form-control rounded" id="text" v-model="selectedItem.css" required>
                    </div>
                    <div class="grid justify-end">
                        <button class="bg-white text-black font-bold mt-2 p-3 rounded" @click="updateData(selectedItem)">Submit</button>
                    </div>
            </card-modal>
        </div>
    </div>
  </AuthenticatedLayout>
</template>

<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';

defineProps({
    sentences: Object,
    modalShowing: Boolean
});
</script>
<script>
export default {
        data() {
            return {
                sentence: [],
                selectedItem: {},
            };
        },
        methods: {
            setSelectedItem(item) {
                this.selectedItem = item;
            },
            updateData(data) {
                let url = `/sentence/${data.id}`;
                axios.put(url, data).then(res =>
                    location.reload(true)
                ).catch((error) => {
                    var err = document.getElementById("error");
                    var p = document.createElement("h1");
                    p.classList.add("text-white", "font-bold");
                    p.innerHTML = error.response.data.message;
                    err.append(p);
                });
            }
        },
    };
</script>
