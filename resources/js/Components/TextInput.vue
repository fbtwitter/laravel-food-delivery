<script setup>
import {onMounted, ref} from 'vue'

defineProps({
    modelValue: {
        type: String,
        required: true
    }
})

defineEmits(["update:modelValue"])

const input = ref(null)

onMounted(() => {
    if (input.value.hasAttribute('autofocus')) {
        input.value.focus()
    }
})

defineExpose({focus: () => input.value.focus()})
</script>

<template>
    <input
        class="rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
        ref="input"
    />
</template>
