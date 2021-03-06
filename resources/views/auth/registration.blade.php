@extends('index')

@section('content')
    <registration inline-template>
        <div v-cloak class="row">
            <div class="col-lg-6 col-lg-offset-3 col-xs-12">
                <div class="panel panel-success">
                    <div class="panel-heading text-center">
                        <h4>{{ 'Регистрация' }}</h4>
                    </div>

                    <div class="panel-body">
                        <form class="form-horizontal" autocomplete="off"
                              @submit.prevent="store('{{ route('registration.post') }}')">

                            <div class="form-group" :class="{ 'has-error': errors.name }">
                                <label class="control-label col-sm-2">Имя</label>
                                <div class="col-sm-10">
                                    <input class="form-control" v-model="form.name" class="col-sm-10" type="text" placeholder="Иванов Иван Иванович">

                                    <div class="help-block" v-if="errors.name" v-text="errors.name[0]"></div>
                                </div>
                            </div>

                            <div class="form-group" :class="{ 'has-error': errors.phone }">
                                <label class="control-label col-sm-2">Телефон</label>
                                <div class="col-sm-10">
                                    <input class="form-control" v-model="form.phone" type="tel" placeholder="71234567890">

                                    <div class="help-block" v-if="errors.phone" v-text="errors.phone[0]"></div>
                                </div>
                            </div>

                            <div class="form-group" :class="{ 'has-error': errors.password }">
                                <label class="control-label col-sm-2">Пароль</label>
                                <div class="col-sm-10">
                                    <input class="form-control" v-model="form.password" type="password">

                                    <div class="help-block" v-if="errors.password"
                                         v-text="errors.password[0]"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <button type="submit" class="btn btn-success btn-block" :disabled="loading">
                                        <i class="fa fa-spin fa-spinner"
                                           v-if="loading"></i> Зарегистрироваться
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </registration>
@endsection