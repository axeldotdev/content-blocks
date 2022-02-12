<template>
    <default-field
        :field="field"
        :errors="errors"
        :show-help-text="showHelpText"
    >
        <template slot="field">
            <div class="cb">
                <Dropdown
                    :label="field.addButtonLabel"
                    :blocks="blocksNames"
                ></Dropdown>
            </div>
        </template>
    </default-field>
</template>

<script>
import { Collection } from 'collect.js';
import { FormField, HandlesValidationErrors } from 'laravel-nova';
import Dropdown from './Dropdown.vue';

export default {
    mixins: [FormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    components: { Dropdown },

    computed: {
        blocksNames() {
            return new Collection(this.field.blocks)
                .map((block) => block.label)
                .sort()
                .all();
        },
    },

    methods: {
        setInitialValue() {
            this.value = this.field.value || '';
        },

        fill(formData) {
            formData.append(this.field.attribute, this.value || '');
        },
    },
};
</script>
