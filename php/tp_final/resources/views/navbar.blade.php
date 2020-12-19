<div class="nes-container" style="display: flex;align-items:center;">
  <a href="{{ route('welcome') }}" style="display: flex;align-items:center;">
    <i class="nes-icon coin is-large"></i>
    <h1 style="margin-left: 1rem;color: black;">
      [H]Admin
    </h1>
  </a>
  <nav style="margin-left: auto;">
    <div style="display: inline-flex; flex-direction:column;">
      <a href="{{ route('promos.index') }}">Show Promos</a>
      <a class="nes-btn" href="{{ route('promos.create') }}">Add Promo</a>
    </div>
    <div style="display: inline-flex; flex-direction:column;">
      <a href="{{ route('modules.index') }}">Show Modules</a>
      <a class="nes-btn" href="{{ route('modules.create') }}">Add Module</a>
    </div>
    <div style="display: inline-flex; flex-direction:column;">
      <a href="{{ route('students.index') }}">Show Students</a>
      <a class="nes-btn" href="{{ route('students.create') }}">Add Student</a>
    </div>
  </nav>
</div>