@extends('layouts.portal')
@section('titulo', 'Política de privacidade')

@section('conteudo')
    <!-- Breadcrumbs -->
    <section class="section section-bredcrumbs shadow"
             style="background: linear-gradient(#000000DD 20%, #00000088 100%), url(/assets/politica.jpg) no-repeat center / cover;">
        <div class="container context-dark breadcrumb-wrapper text-left">
            <h1>Política de privacidade</h1>
            <div class="line"></div>
        </div>
    </section>
    <!-- Form -->
    <section class="section section-lg bg-default">
        <div class="container relative-container"><h2>Política Privacidade</h2>
            <p>Endereço: <strong>Tv. Timbó, 1244, Pedreira, Belém</strong></p>
            <p>A sua privacidade é importante para nós. É política do Refúgio Lifestyle respeitar a sua privacidade em
                relação a qualquer informação sua que possamos coletar no site <a href="{{ env("APP_URL") }}"/>Refúgio
                Lifestyle</a>, e outros sites que possuímos e operamos.</p>
            <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um serviço.
                Fazemo-lo por meios justos e legais, com o seu conhecimento e consentimento. Também informamos por que
                estamos coletando e como será usado.</p>
            <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado. Quando
                armazenamos dados, protegemos dentro de meios comercialmente aceitáveis para evitar perdas e roubos, bem
                como acesso, divulgação, cópia, uso ou modificação não autorizados.</p>
            <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto quando
                exigido
                por lei.</p>
            <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de que não
                temos
                controle sobre o conteúdo e práticas desses sites e não podemos aceitar responsabilidade por suas
                respectivas políticas de privacidade.</p>
            <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não possamos
                fornecer alguns dos serviços desejados.</p>
            <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de privacidade
                e
                informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do usuário e informações
                pessoais, entre em contacto connosco.</p>
            <h3>Mais informações</h3>
            <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não tem
                certeza se
                precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso interaja com um dos recursos
                que
                você usa em nosso site.</p>
            <p>Esta política é efetiva a partir de <strong>Fevereiro</strong>/<strong>2023</strong>.</p>
        </div>
    </section>
@endsection
