<template>
    <!-- Alerts -->
    <div v-if="$page.props.flash.message" class="absolute left-1/2 -translate-x-1/2 top-4 w-96 text-center p-4 bg-gradient-to-r from-green-500 to-emerald-500 text-white rounded-xl shadow-xl">
        {{ $page.props.flash.message }}
    </div>

    <div v-if="$page.props.flash.error" class="absolute left-1/2 -translate-x-1/2 top-4 w-96 text-center p-4 bg-gradient-to-r from-red-500 to-pink-500 text-white rounded-xl shadow-xl">
        {{ $page.props.flash.error }}
    </div>

    <!-- Main container -->
    <div class="flex h-screen justify-center items-center bg-yellow-50">

        <div class="w-96 bg-white rounded-xl shadow-xl">
            <div class="text-center text-white font-semibold text-2xl p-4 rounded-t-xl bg-gradient-to-r from-cyan-500 to-blue-500">Оставьте заявку</div>
            
            <!-- Форма -->
            <form @submit.prevent="feedback.post('/submit')" class="p-4">
                <!-- Поле имени-->
                <label for="name" class="block">
                    <span class="sr-only">Имя</span>
                    <input v-model="feedback.name" type="text" id="name" class="mt-1 block w-full rounded-md border border-slate-300 py-2 pl-4 font-light focus:border-indigo-500 focus:shadow-md placeholder:italic placeholder:text-slate-400" placeholder="Ваше имя">
                </label>
                <!-- Ошибки поля имени -->
                <div v-if="feedback.errors.name" class="text-xs text-red-500 mt-1">{{ feedback.errors.name }}</div>

                <!-- Поле электронной почты-->
                <label for="name" class=" block mt-4">
                    <span class="sr-only">Электронная почта</span>
                    <input v-model="feedback.email" type="text" id="name" class="mt-1 block w-full rounded-md border border-slate-300 py-2 pl-4 font-light focus:border-indigo-500 focus:shadow-md placeholder:italic placeholder:text-slate-400" placeholder="Ваша электронная почта">
                </label>
                <!-- Ошибки электронной почты -->
                <div v-if="feedback.errors.email" class="text-xs text-red-500 mt-1">{{ feedback.errors.email }}</div>

                <!-- Поле отзыва -->
                <label for="name" class=" block mt-4">
                    <span class="sr-only">Заявка</span>
                    <textarea v-model="feedback.body" type="text" id="name" class="mt-1 block w-full rounded-md border border-slate-300 py-2 pl-4 font-light focus:border-indigo-500 focus:shadow-md placeholder:italic placeholder:text-slate-400 h-48" placeholder="Ваша заявка (необязательно)"></textarea>
                </label>

                <button type="submit" class="mt-4 w-full rounded-md py-2 px-4 bg-gradient-to-r from-green-500 to-emerald-600 text-white font-bold hover:opacity-90">Отправить заявку</button>
            </form>
        </div>
    </div>
</template>

<script setup>
    import { useForm } from '@inertiajs/vue3'

    const feedback = useForm({
        name: null,
        email: null,
        body: null
    })
</script>