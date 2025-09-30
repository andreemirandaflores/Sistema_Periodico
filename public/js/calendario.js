document.addEventListener('DOMContentLoaded', () => {
  const calendario = document.getElementById('calendario');
  const fechasInput = document.getElementById('fechasSeleccionadas');
  const mesLabel = document.getElementById('mesActual');
  const prevBtn = document.getElementById('prevMes');
  const nextBtn = document.getElementById('nextMes');

  const hoy = new Date();
  let mesActual = hoy.getMonth();
  let anioActual = hoy.getFullYear();

  const fechas = new Set(
    (fechasInput.value || '').split(',').map(s => s.trim()).filter(Boolean)
  );

  function syncFechas() {
    const ordenadas = Array.from(fechas).sort();
    fechasInput.value = ordenadas.join(',');
    document.dispatchEvent(new Event('fechasCambiaron'));
  }

  function renderCalendario(mes, anio) {
    calendario.innerHTML = '';
    mesLabel.textContent = new Date(anio, mes).toLocaleString('es-ES', { month: 'long', year: 'numeric' });

    const totalDias = new Date(anio, mes + 1, 0).getDate();
    const offset = (new Date(anio, mes, 1).getDay() + 6) % 7; // lunes=0

    for (let i = 0; i < offset; i++) calendario.appendChild(document.createElement('div'));

    for (let d = 1; d <= totalDias; d++) {
      const cell = document.createElement('div');
      cell.classList.add('dia');
      const span = document.createElement('span');
      span.textContent = d;
      cell.appendChild(span);

      const fechaStr = `${anio}-${String(mes + 1).padStart(2, '0')}-${String(d).padStart(2, '0')}`;
      cell.dataset.fecha = fechaStr; // <-- asignamos data-fecha

      const fechaDia = new Date(anio, mes, d);
      const esPasado = fechaDia < new Date(hoy.getFullYear(), hoy.getMonth(), hoy.getDate());

      if (esPasado) {
        cell.classList.add('inactivo');
      } else {
        if (fechas.has(fechaStr)) cell.classList.add('dia-activo'); // <-- clase dia-activo

        cell.addEventListener('click', () => {
          if (cell.classList.contains('dia-activo')) {
            cell.classList.remove('dia-activo');
            fechas.delete(fechaStr);
          } else {
            cell.classList.add('dia-activo');
            fechas.add(fechaStr);
          }
          syncFechas();
        });
      }

      calendario.appendChild(cell);
    }

    if (fechas.size === 0 && mes === hoy.getMonth() && anio === hoy.getFullYear()) {
      const hoyStr = `${anio}-${String(mes + 1).padStart(2, '0')}-${String(hoy.getDate()).padStart(2, '0')}`;
      fechas.add(hoyStr);
      const indexCell = offset + hoy.getDate() - 1;
      const cellHoy = calendario.children[indexCell];
      if (cellHoy) cellHoy.classList.add('dia-activo');
      syncFechas();
    }
  }

  prevBtn.addEventListener('click', () => {
    mesActual--;
    if (mesActual < 0) { mesActual = 11; anioActual--; }
    renderCalendario(mesActual, anioActual);
  });

  nextBtn.addEventListener('click', () => {
    mesActual++;
    if (mesActual > 11) { mesActual = 0; anioActual++; }
    renderCalendario(mesActual, anioActual);
  });

  renderCalendario(mesActual, anioActual);
});
