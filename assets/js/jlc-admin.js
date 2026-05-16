jQuery(document).ready(function ($) {
  /**
   * ==========================
   * CONFIG
   * ==========================
   */
  const defaultTab = 'settings';
  const allowedTabs = ['settings', 'content', 'custom-css'];

  /**
   * ==========================
   * HELPERS
   * ==========================
   */
  const getCurrentUrl = () => {
    return new URL(window.location.href);
  };

  const getTabFromUrl = () => {
    const url = getCurrentUrl();
    const tab = url.searchParams.get('tab');

    if (allowedTabs.includes(tab)) {
      return tab;
    }

    return defaultTab;
  };

  const getSectionSelector = (tab) => {
    return '#jlc-sm-' + tab;
  };

  const updateRefererField = (tab) => {
    const refererField = $('input[name="_wp_http_referer"]');

    if (!refererField.length) {
      return;
    }

    const url = getCurrentUrl();

    url.searchParams.set('page', 'jlc-site-maintenance');
    url.searchParams.set('tab', tab);

    refererField.val(url.pathname + url.search);
  };

  const updateUrlTab = (tab) => {
    const url = getCurrentUrl();

    url.searchParams.set('tab', tab);

    window.history.replaceState({}, '', url.toString());

    updateRefererField(tab);
  };

  /**
   * ==========================
   * ACTIVATE TAB
   * ==========================
   */
  const activateTab = (tab, shouldUpdateUrl = true) => {
    if (!allowedTabs.includes(tab)) {
      tab = defaultTab;
    }

    const sectionSelector = getSectionSelector(tab);
    const section = $(sectionSelector);
    const navTab = $('.jlc-sm-tabs .nav-tab[data-tab-target="' + tab + '"]');

    if (!section.length || !navTab.length) {
      return;
    }

    $('.jlc-sm-tabs .nav-tab').removeClass('nav-tab-active');
    navTab.addClass('nav-tab-active');

    $('.jlc-sm-admin-section').hide();
    section.show();

    if (shouldUpdateUrl) {
      updateUrlTab(tab);
    } else {
      updateRefererField(tab);
    }
  };

  /**
   * ==========================
   * INIT ACTIVE TAB
   * ==========================
   */
  activateTab(getTabFromUrl(), false);

  /**
   * ==========================
   * ADMIN TABS
   * ==========================
   */
  $('.jlc-sm-tabs .nav-tab[data-tab-target]').on('click', function (event) {
    event.preventDefault();

    const tab = $(this).data('tab-target');

    activateTab(tab, true);
  });

  /**
   * ==========================
   * MEDIA UPLOADER
   * ==========================
   */
  $('.jlc-sm-upload-image').on('click', function (event) {
    event.preventDefault();

    const button = $(this);
    const wrapper = button.closest('td');

    const imageIdInput = wrapper.find('.jlc-sm-image-id');
    const imageUrlInput = wrapper.find('.jlc-sm-image-url');
    const preview = wrapper.find('.jlc-sm-image-preview');

    const frame = wp.media({
      title: jlcSmAdmin.mediaTitle || 'Seleccionar imagen',
      button: {
        text: jlcSmAdmin.mediaButton || 'Usar esta imagen',
      },
      multiple: false,
    });

    frame.on('select', function () {
      const attachment = frame.state().get('selection').first().toJSON();

      imageIdInput.val(attachment.id);
      imageUrlInput.val(attachment.url);

      preview.html(
        '<img src="' +
        attachment.url +
        '" alt="">'
      );
    });

    frame.open();
  });
});