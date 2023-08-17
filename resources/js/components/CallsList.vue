<!-- resources/js/components/CallsList.vue -->
<template>
    <table class="table">
        <thead>
        <tr>
            <th>Звонок от</th>
            <th>Звонок к</th>
            <th>Оператор звонившего</th>
            <th>Оператор получателя</th>
            <th>Длительность звонка</th>
            <th>Общая стоимость</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="call in calls" :key="call.id">
            <td><a @click="userStatisticsLink(call.call_from)" class="clickable-link">{{ call.userFromName }}</a></td>
            <td><a @click="userStatisticsLink(call.call_from)" class="clickable-link">{{ call.userToName }}</a></td>
            <td>{{ call.from_operator_name}}</td>
            <td>{{ call.to_operator_name}}</td>
            <td>{{ call.duration }}</td>
            <td>{{ call.cost }} ₸</td>
            <td>
                <form @submit.prevent="deleteCall(call.id)">
                    <button type="submit" style="background: none; border: none">
                        <svg style="width:20px;height: 20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path d="M135.2 17.69C140.6 6.848 151.7 0 163.8 0H284.2C296.3 0 307.4 6.848 312.8 17.69L320 32H416C433.7 32 448 46.33 448 64C448 81.67 433.7 96 416 96H32C14.33 96 0 81.67 0 64C0 46.33 14.33 32 32 32H128L135.2 17.69zM394.8 466.1C393.2 492.3 372.3 512 346.9 512H101.1C75.75 512 54.77 492.3 53.19 466.1L31.1 128H416L394.8 466.1z"/></svg>                    </button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>


</template>


<script>
export default {
    props: {
        calls: Array,
    },
    methods: {
        async deleteResource(callId) {
            try {
                const response = await axios.delete(`/call/${callId}`, {
                    headers: {
                        'ngrok-skip-browser-warning': 'true' // Add your desired value here
                    }
                });
                console.log('Ресурс успешно удален', response.data);
            } catch (error) {
                console.error('Произошла ошибка при удалении ресурса', error);
            }
        },
        async deleteCall(callId) {
            if (confirm('Вы уверены, что хотите удалить этот вызов?')) {
                await this.deleteResource(callId);
                location.reload();
            }
        },

        userStatisticsLink(userId) {
            window.location.href = '/call/'+ userId+'/statistics';
        }
    }
};

</script>
