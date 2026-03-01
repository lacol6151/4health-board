# 4Health 게시판 과제

Laravel을 처음 사용해보면서 로그인과 게시판 CRUD를 구현했습니다.

## 개발 환경

- PHP 8.3
- Laravel 12
- MySQL 8.4
- Laragon

## 실행 방법

1. 저장소 클론
```bash
git clone https://github.com/lacol6151/4health-board.git
cd 4health-board
```

2. 패키지 설치
```bash
composer install
npm install
```

3. .env 파일 설정
```bash
cp .env.example .env
php artisan key:generate
```

4. .env에서 DB 정보 수정
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=4health_board
DB_USERNAME=root
DB_PASSWORD=
```

5. 마이그레이션 및 시더 실행
```bash
php artisan migrate
php artisan db:seed
```

6. 서버 실행
```bash
php artisan serve
npm run dev
```

접속 주소: http://127.0.0.1:8000

## 테스트 계정

- 이메일: admin@4health.com
- 비밀번호: password123

## 테이블 정보

### users
- id, name, email, password, created_at, updated_at

### posts
- id, user_id, title, content, created_at, updated_at