document.addEventListener('DOMContentLoaded', () => {
  const maintenancePage = document.querySelector('.jlc-sm-page');

  if (!maintenancePage) {
    return;
  }

  /**
   * =========================================
   * ELEMENTS
   * =========================================
   */
  const daysElement = document.getElementById('jlc-sm-days');
  const hoursElement = document.getElementById('jlc-sm-hours');
  const minutesElement = document.getElementById('jlc-sm-minutes');
  const secondsElement = document.getElementById('jlc-sm-seconds');

  /**
   * =========================================
   * CONFIG
   * =========================================
   */
  const deadline = maintenancePage.dataset.deadline;
  const homeUrl = maintenancePage.dataset.homeUrl;

  if (!deadline) {
    return;
  }

  const targetDate = new Date(deadline).getTime();

  /**
   * =========================================
   * FORMAT
   * =========================================
   */
  const formatNumber = (number) => {
    return number.toString().padStart(2, '0');
  };

  /**
   * =========================================
   * REDIRECT
   * =========================================
   */
  const redirectToHome = () => {
    window.location.href = homeUrl;
  };

  /**
   * =========================================
   * UPDATE COUNTDOWN
   * =========================================
   */
  const updateCountdown = () => {
    const now = new Date().getTime();

    const distance = targetDate - now;

    /**
     * FINISHED
     */
    if (distance <= 0) {
      daysElement.textContent = '00';
      hoursElement.textContent = '00';
      minutesElement.textContent = '00';
      secondsElement.textContent = '00';

      clearInterval(countdownInterval);

      redirectToHome();

      return;
    }

    /**
     * TIME CALCULATIONS
     */
    const days = Math.floor(distance / (1000 * 60 * 60 * 24));

    const hours = Math.floor(
      (distance % (1000 * 60 * 60 * 24)) /
      (1000 * 60 * 60)
    );

    const minutes = Math.floor(
      (distance % (1000 * 60 * 60)) /
      (1000 * 60)
    );

    const seconds = Math.floor(
      (distance % (1000 * 60)) /
      1000
    );

    /**
     * RENDER
     */
    daysElement.textContent = formatNumber(days);
    hoursElement.textContent = formatNumber(hours);
    minutesElement.textContent = formatNumber(minutes);
    secondsElement.textContent = formatNumber(seconds);
  };

  /**
   * INIT
   */
  updateCountdown();

  /**
   * INTERVAL
   */
  const countdownInterval = setInterval(updateCountdown, 1000);
});