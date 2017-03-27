@extends('index')

@section('content')
    <profile :profile-get-url="'{{ route('profile.get', auth()->id())  }}'" inline-template>
            <div v-cloak class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="text-center">Профиль пользователя</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" autocomplete="off"
                          @submit.prevent="store('{{ route('profile.update', auth()->id()) }}')">
                        <div class="form-group" :class="{ 'has-error': errors.name }">
                            <label class="col-sm-2">Имя</label>
                            <div class="col-sm-10">
                                <input class="form-control" v-model="form.name" type="text">

                                <div class="help-block" v-if="errors.name" v-text="errors.name[0]"></div>
                            </div>
                        </div>
                        <div class="form-group" :class="{ 'has-error': errors.phone }">
                            <label class="col-sm-2">Телефон</label>
                            <div class="col-sm-10">
                                <input class="form-control" v-model="form.phone" type="tel">

                                <div class="help-block" v-if="errors.phone" v-text="errors.phone[0]"></div>
                            </div>
                        </div>
                        <div class="form-group" :class="{ 'has-error': errors.password }">
                            <label class="col-sm-2">Пароль</label>
                            <div class="col-sm-10">
                                <input class="form-control" v-model="form.password" type="password">

                                <div class="help-block" v-if="errors.password" v-text="errors.password[0]"></div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <button type="submit" class="btn btn-success" :disabled="loading">
                                <i class="fa fa-spin fa-spinner" v-if="loading"></i> Сохранить
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </profile>
@endsection