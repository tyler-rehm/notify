<template>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Message</div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form">

                        <!-- Name -->
                        <div class="form-group" :class="{'has-error': form.errors.has('name')}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" v-model="form.name" autofocus>

                                <span class="help-block" v-show="form.errors.has('name')">
                                    {{ form.errors.get('name') }}
                                </span>
                            </div>
                        </div>

                        <!-- Phone Number -->
                        <div class="form-group" :class="{'has-error': form.errors.has('phone_number')}">
                            <label class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="phone_number" v-model="form.phone_number">

                                <span class="help-block" v-show="form.errors.has('phone_number')">
                                    {{ form.errors.get('phone_number') }}
                                </span>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group" :class="{'has-error': form.errors.has('email')}">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="email" v-model="form.email">

                                <span class="help-block" v-show="form.errors.has('email')">
                                    {{ form.errors.get('email') }}
                                </span>
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="form-group" :class="{'has-error': form.errors.has('message_type_id')}">
                            <label class="col-md-4 control-label">Type</label>

                            <div class="col-md-6">
                                <select class="form-control" name="message_type_id" v-model="form.message_type_id">
                                    <option value="1" selected>Broadcast</option>
                                    <option value="2">Appointment</option>
                                </select>

                                <span class="help-block" v-show="form.errors.has('message_type_id')">
                                    {{ form.errors.get('message_type_id') }}
                                </span>
                            </div>
                        </div>

                        <div v-if="form.message_type_id == 2">
                            <!-- Date -->
                            <div class="form-group" :class="{'has-error': form.errors.has('date')}">
                                <label class="col-md-4 control-label">Date</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="date" v-model="form.date" />

                                    <span class="help-block" v-show="form.errors.has('date')">
                                        {{ form.errors.get('date') }}
                                    </span>
                                </div>
                            </div>

                            <!-- Time -->
                            <div class="form-group" :class="{'has-error': form.errors.has('time')}">
                                <label class="col-md-4 control-label">Time</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="time" v-model="form.time" />

                                    <span class="help-block" v-show="form.errors.has('time')">
                                        {{ form.errors.get('time') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Email Address -->
                        <div class="form-group" :class="{'has-error': form.errors.has('message')}">
                            <label class="col-md-4 control-label">Message</label>

                            <div class="col-md-6">
                                <textarea class="form-control" name="message" v-model="form.message"></textarea>

                                <span class="help-block" v-show="form.errors.has('message')">
                                    {{ form.errors.get('message') }}
                                </span>
                            </div>
                        </div>

                        <!-- Update Button -->
                        <div class="form-group">
                            <div class="col-md-offset-4 col-md-6">
                                <button type="submit" class="btn btn-primary" @click="add" :disabled="form.busy">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="alert alert-success" v-if="form.successful">
                        Your contact information has been updated!
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: new SparkForm({
                    name: '',
                    phone_number: '',
                    email: '',
                    message_type_id: '',
                    message: '',
                    date: '',
                    time: ''
                })
            };
        },
        methods: {
            add() {
                Spark.post('/api/messages/add', this.form)
                        .then(response => {
                            console.log(response);
                        });
            }
        },
        computed: {

        },
        ready(){

        }
    }
</script>