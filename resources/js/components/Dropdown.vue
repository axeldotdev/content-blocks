<template>
    <div class="cb-relative cb-inline-block cb-text-left">
        <div>
            <button
                @click="toggle"
                type="button"
                class="cb-inline-flex cb-justify-center cb-w-full cb-rounded-md cb-border cb-border-gray-300 cb-shadow-sm cb-px-4 cb-py-2 cb-bg-white cb-text-sm cb-font-medium cb-text-gray-700 hover:cb-bg-gray-50 focus:cb-outline-none focus:cb-ring-2 focus:cb-ring-offset-2 focus:cb-ring-offset-gray-100 focus:cb-ring-indigo-500"
                id="menu-button"
                aria-expanded="true"
                aria-haspopup="true"
            >
                {{ label }}
                <svg
                    class="-cb-mr-1 cb-ml-2 cb-h-5 cb-w-5"
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20"
                    fill="currentColor"
                    aria-hidden="true"
                >
                    <path
                        fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"
                    />
                </svg>
            </button>
        </div>

        <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        <div
            class="cb-origin-top-right cb-absolute cb-right-0 cb-mt-2 cb-w-56 cb-rounded-md cb-shadow-lg cb-bg-white cb-ring-1 cb-ring-black cb-ring-opacity-5 focus:cb-outline-none"
            role="menu"
            aria-orientation="vertical"
            aria-labelledby="menu-button"
            tabindex="-1"
        >
            <div class="cb-py-1" role="none">
                <button
                    v-for="(block, index) in blocks"
                    :key="index"
                    @click="select(block)"
                    class="cb-text-gray-700 cb-block cb-px-4 cb-py-2 cb-text-sm"
                    role="menuitem"
                    tabindex="-1"
                    :id="`menu-item-${index}`"
                >
                    {{ block }}
                </button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['label', 'blocks'],

    data() {
        return {
            opened: false,
        };
    },

    methods: {
        toggle() {
            this.opened = !this.opened;
        },

        select(block) {
            this.$emit('select', block);
        },
    },
};
</script>
