<template>
        <form class="form-control">
            <div class="">
                <label for="timeRange" class="sr-only">По времени:</label>
                <select class="form-control" v-model="timeRange" @change="fetchStatistics">
                    <option value="hour">За последний час</option>
                    <option value="week">За последную неделю</option>
                    <option value="month">За последний месяц</option>
                </select>
            </div>
        </form>

        <div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Количество потраченных денег</th>
                    <th scope="col">Общая длительность звонков</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>{{statistics.totalCost}}</td>
                    <td>{{statistics.totalDuration}} seconds</td>
                </tr>
                </tbody>
            </table>
        </div>
</template>

<script>
export default {
    props: {
        userId: {
            type: Number,
            required: true,
        },

    },
    data() {
        return {
            timeRange: 'hour',
            statistics: {     totalCost: 0,
                totalDuration: 0},
        };
    },
    methods: {
        fetchStatistics() {
            axios.get('/call/statistics/by-date', {
                params: {
                    timeRange: this.timeRange,
                    user_id : this.userId,
                },
                headers: {
                    'ngrok-skip-browser-warning': 'true'
                }
            })
                .then((response) => {
                    this.statistics = response.data;
                })
                .catch((error) => {
                    console.log(error);
                });
        },
    },
    created() {
        this.fetchStatistics(); // Загрузка статистики при создании компонента
    },
};
</script>
