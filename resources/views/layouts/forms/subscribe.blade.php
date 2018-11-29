<section class="subscribe">
    <div class="container">
        <div class="row">
            <div class="col-10">
                <div class="subscribe__box grey">
                    <div class="title">Подпишитесь и узнавайте о самых интересных материалах на KRASBER</div>
                    <form action="{{route('subscribe.send')}}" class="subscribe" id="subscribe__form" method="post">
                        @csrf
                        <div class="single__block email__block">
                            <input type="email" name="email" placeholder="Укажите ваш Email" autocomplete="off" required>
                            <div class="single__block agree__block info__message">
                                <input type="checkbox" name="agree" id="i_agree-subscribe" value="1" checked>
                                <label for="i_agree-subscribe">Оставляя заявку, вы соглашаетесь на <a href="{{ route('page.show', ['alias' => 'personal-data']) }}" target="_blank" title="Перейти на страницу описания">обработку персональных данных</a></label>
                                <p class="error">Согласитесь на обработку персональных данных</p>
                            </div>
                        </div>
                        <div class="single__block">
                            <button type="submit">ПОДПИСАТЬСЯ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>