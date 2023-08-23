<template>
    <div className="row mb-3">
        <label htmlFor="phone" className="col-md-4 col-form-label text-md-end">{{ ('Phone Number') }}</label>
        <div className="col-md-6">
            <input type="text" name="phone" className="form-control" v-model="phoneNumber"
                   @input="formatPhoneNumber" placeholder="+7(XXX)-XXX-XX-XX">
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            phoneNumber: '',
        };
    },
    methods: {
        formatPhoneNumber() {
            let formattedPhone = this.phoneNumber.replace(/\D/g, ''); // Удаляем все, кроме цифр

            // Проверяем, что номер телефона не пустой
            if (formattedPhone.length > 0) {
                // Добавляем префикс в зависимости от страны
                if (formattedPhone[0] !== '+') {
                    formattedPhone = '+' + formattedPhone;
                }

                // Форматируем номер в нужную маску
                if (formattedPhone.length > 2) {
                    formattedPhone = formattedPhone.substring(0, 2) + '(' + formattedPhone.substring(2);
                }
                if (formattedPhone.length > 6) {
                    formattedPhone = formattedPhone.substring(0, 6) + ')' + formattedPhone.substring(6);
                }
                if (formattedPhone.length > 10) {
                    formattedPhone = formattedPhone.substring(0, 10) + '-' + formattedPhone.substring(10);
                }
                if (formattedPhone.length > 13) {
                    formattedPhone = formattedPhone.substring(0, 13) + '-' + formattedPhone.substring(13);
                }
            }

            this.phoneNumber = formattedPhone;
        }

    },
};
</script>

<style>
/* Ваши стили */
</style>
