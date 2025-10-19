<footer class="site-footer">
    <div class="container footer-content">
        <div class="footer-section">
            <h3>Book of Shadows</h3>
            <p>Um grimório digital que reúne saberes antigos e encantos para os bruxos da era moderna — um portal onde o
                espírito do Halloween vive em cada feitiço, celebração e sombra iluminada pela lua.</p>
        </div>

        <div class="footer-section">
            <h4>Explorar</h4>
            <ul class="footer-links">
                <li><a href="{{ route('grimoire.spells') }}">Feitiços</a></li>
                <li><a href="{{ route('grimoire.rituals') }}">Rituais</a></li>
                <li><a href="{{ route('grimoire.herbology') }}">Ervas Mágicas</a></li>
                <li><a href="" onclick="showComingSoonAlert('Cristais')">Cristais</a>
                </li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Histórias</h4>
            <ul class="footer-links">
                <li><a href="{{ route('urban-legends') }}">Lendas Urbanas</a></li>
                <li><a href="{{ route('horror-stories') }}">Contos de Terror</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Recursos</h4>
            <ul class="footer-links">
                <li><a href="{{ route('reviews.index') }}">Reviews</a></li>
                <li><a href="{{ route('macabre-newsletter') }}">Boletim Macabro</a></li>
                <li><a href="" onclick="showComingSoonAlert('Blog')">Blog</a></li>
                <li><a href="" onclick="showComingSoonAlert('Calendário Lunar')">Calendário Lunar</a></li>
                <li><a href="" onclick="showComingSoonAlert('Glossário')">Glossário</a></li>
                <li><a href="" onclick="showComingSoonAlert('Contato')">Contato</a></li>
            </ul>
        </div>

        <div class="footer-section">
            <h4>Conecte-se</h4>
            <div class="social-links">
                <a href="#" aria-label="Instagram" title="Siga-nos no Instagram">
                    {{-- <span class="social-icon">📸</span> --}}
                    <i class="fa-brands fa-instagram"></i>
                    <span class="social-text">Instagram</span>
                </a>
                <a href="#" aria-label="Facebook" title="Curta nossa página no Facebook">
                    {{-- <span class="social-icon">📘</span> --}}
                    <i class="fa-brands fa-square-facebook"></i>
                    <span class="social-text">Facebook</span>
                </a>
                <a href="#" aria-label="Pinterest" title="Veja nossos boards no Pinterest">
                    {{-- <span class="social-icon">📌</span> --}}
                    <i class="fa-brands fa-square-pinterest"></i>
                    <span class="social-text">Pinterest</span>
                </a>
                <a href="https://github.com/Grazziano/book-of-shadows" aria-label="GitHub" title="Contribua no GitHub">
                    {{-- <span class="social-icon">💻</span> --}}
                    <i class="fa-brands fa-github"></i>
                    <span class="social-text">GitHub</span>
                </a>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p class="copyright">© 2025 Book of Shadows. Todos os direitos reservados.</p>
            <div class="footer-legal">
                <a href="/privacidade">Política de Privacidade</a>
                <a href="/termos">Termos de Uso</a>
            </div>
        </div>
    </div>
</footer>

<script>
    function showComingSoonAlert(message) {
        alert(`🔮 Em breve: seção de ${message} estará disponível!`);
        return false;
    }
</script>
