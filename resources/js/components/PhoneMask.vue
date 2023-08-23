<template>

            <select class="form-control mb-2" @change="updatePhoneNumber" v-model="selectedOperator" name="operator_id">
                <option value="" disabled>Выберите ваш оператор</option>
                <option v-for="operator in operators" :key="operator.id" :value="operator.id">{{ operator.name }}</option>
            </select>

    <div class="phone-input rounded">
        <input
            v-model="operatorCode"
            readonly
            class="operator-code"
            @input="updatePhoneNumber"
            name="prefix"
            :key="operatorCode.id"
        />
        <input v-model="phoneNumber" name="phone" @input="formatPhoneNumber" />

    </div>




</template>

<script>
export default {
    data() {
        return {
            operatorCode: '+7',
            phoneNumber: '',
            selectedOperator: '',

        };
    },
    props: {
        operators: {
            type: Array,
            required: true,
        },
    },
    methods: {
        updatePhoneNumber() {
            const selectedOperator = this.operators.find(operator => operator.id === this.selectedOperator);
            if (selectedOperator) {
                this.operatorCode = selectedOperator.prefix;
            } else {
                this.operatorCode = '';
            }

        },
        formatPhoneNumber() {
            this.phoneNumber = this.phoneNumber.replace(/\D+/g, ''); // Удалить все нечисловые символы

            if (this.phoneNumber.length > 7) {
                this.phoneNumber = this.phoneNumber.slice(0, 7); // Обрезать до 7 цифр
            }

            if (this.phoneNumber.length === 7) {
                const formatted = this.phoneNumber.replace(/(\d{3})(\d{2})(\d{2})/, '$1-$2-$3');
                this.phoneNumber = formatted;
            }
        },
        },

};
</script>

<style>
.phone-input {
    display: flex;
    align-items: center;
}

.operator-code {
    width: 70px;
    text-align: center;
}
</style>
